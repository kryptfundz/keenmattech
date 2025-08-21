// Wallet Manager Class
class WalletManager {
    constructor() {
        this.provider = null;
        this.signer = null;
        this.connectedAddress = null;
        this.chainId = null;
        this.baseSepoliaChainId = '0x14a34'; // Base Sepolia Chain ID
        this.isWalletConnect = false;
    }

    async init() {
        // Check if any wallet provider is available
        if (!window.ethereum && !window.WalletConnectProvider) {
            console.error("No wallet provider detected");
            return false;
        }

        // Initialize event listeners
        if (window.ethereum) {
            window.ethereum.on('accountsChanged', this.handleAccountsChanged.bind(this));
            window.ethereum.on('chainChanged', this.handleChainChanged.bind(this));
        }

        return true;
    }

    async connectWallet() {
        try {
            updateWalletButtonState('loading', 'Connecting...');
            
            // Try MetaMask first
            if (window.ethereum) {
                await this.connectMetaMask();
            } else {
                await this.connectWalletConnect();
            }

            await this.updateWalletInfo();
            return true;
        } catch (error) {
            console.error("Wallet connection failed:", error);
            updateWalletButtonState('error', 'Connection Failed');
            showWalletError(error.message);
            return false;
        }
    }

    async connectMetaMask() {
        const accounts = await window.ethereum.request({ method: 'eth_requestAccounts' });
        this.provider = new ethers.BrowserProvider(window.ethereum);
        await this.switchToBaseSepolia();
        this.isWalletConnect = false;
        return this.handleAccountsChanged(accounts);
    }

    async connectWalletConnect() {
        const walletConnectProvider = new WalletConnectProvider({
            rpc: {
                84532: 'https://sepolia.base.org' // Base Sepolia RPC
            }
        });
        
        await walletConnectProvider.enable();
        this.provider = new ethers.BrowserProvider(walletConnectProvider);
        this.isWalletConnect = true;
        const accounts = await this.provider.listAccounts();
        return this.handleAccountsChanged(accounts.map(a => a.address));
    }

    async switchToBaseSepolia() {
        const chainId = await window.ethereum.request({ method: 'eth_chainId' });
        if (chainId !== this.baseSepoliaChainId) {
            try {
                await window.ethereum.request({
                    method: 'wallet_switchEthereumChain',
                    params: [{ chainId: this.baseSepoliaChainId }]
                });
            } catch (switchError) {
                if (switchError.code === 4902) {
                    await window.ethereum.request({
                        method: 'wallet_addEthereumChain',
                        params: [{
                            chainId: this.baseSepoliaChainId,
                            chainName: 'Base Sepolia',
                            nativeCurrency: {
                                name: 'Ether',
                                symbol: 'ETH',
                                decimals: 18
                            },
                            rpcUrls: ['https://sepolia.base.org'],
                            blockExplorerUrls: ['https://sepolia-explorer.base.org']
                        }]
                    });
                } else {
                    throw switchError;
                }
            }
        }
    }

    async handleAccountsChanged(accounts) {
        if (!accounts || accounts.length === 0) {
            return this.disconnectWallet();
        }
        
        this.connectedAddress = accounts[0];
        this.signer = await this.provider.getSigner();
        this.chainId = await this.signer.getChainId();
        
        await this.updateWalletInfo();
        await this.loadNFTs();
    }

    async handleChainChanged(chainId) {
        this.chainId = parseInt(chainId, 16);
        this.updateUI();
        
        if (this.chainId !== parseInt(this.baseSepoliaChainId, 16)) {
            showWalletError("Please switch to Base Sepolia");
        } else {
            await this.loadNFTs();
        }
    }

    async updateWalletInfo() {
        if (!this.connectedAddress) return;
        
        try {
            const balance = await this.provider.getBalance(this.connectedAddress);
            const formattedBalance = ethers.formatEther(balance).substring(0, 6);
            
            document.getElementById('walletAddress').textContent = this.connectedAddress;
            document.getElementById('walletBalance').textContent = formattedBalance;
            document.getElementById('networkName').textContent = 
                this.chainId === parseInt(this.baseSepoliaChainId, 16) ? 'Base Sepolia' : 'Unknown';
            
            updateWalletButtonState('connected', `${this.connectedAddress.substring(0, 6)}...`);
            document.getElementById('walletInfo').classList.add('active');
        } catch (error) {
            console.error("Failed to update wallet info:", error);
        }
    }

    async loadNFTs() {
        if (!this.connectedAddress || this.chainId !== parseInt(this.baseSepoliaChainId, 16)) {
            return;
        }

        const nftGrid = document.querySelector('.nft-grid');
        try {
            nftGrid.innerHTML = '<div class="loading">Loading NFTs...</div>';
            
            const response = await fetch(`https://api.opensea.io/api/v2/chain/base-sepolia/account/${this.connectedAddress}/nfts`, {
                headers: {
                    'Accept': 'application/json',
                    'X-API-KEY': 'your-opensea-api-key' // Replace with your key
                }
            });
            
            if (!response.ok) throw new Error(`API error: ${response.status}`);
            
            const data = await response.json();
            this.displayNFTs(data.nfts || []);
        } catch (error) {
            console.error("NFT load error:", error);
            nftGrid.innerHTML = `<div class="error">Error loading NFTs: ${error.message}</div>`;
        }
    }

    displayNFTs(nfts) {
        const nftGrid = document.querySelector('.nft-grid');
        nftGrid.innerHTML = '';
        
        if (nfts.length === 0) {
            nftGrid.innerHTML = '<div class="no-nfts">No NFTs found on Base Sepolia</div>';
            return;
        }
        
        nfts.forEach(nft => {
            const nftCard = document.createElement('div');
            nftCard.className = 'nft-card tilt';
            nftCard.innerHTML = `
                <img src="${nft.image_url || 'assets/images/nft-placeholder.png'}" 
                     alt="${nft.name || 'NFT'}" 
                     class="nft-image" 
                     loading="lazy">
                <div class="nft-info">
                    <h3>${nft.name || 'Unnamed NFT'}</h3>
                    <p class="nft-collection">${nft.collection || 'Unknown Collection'}</p>
                </div>
            `;
            nftGrid.appendChild(nftCard);
        });
    }

    async disconnectWallet() {
        if (this.isWalletConnect && this.provider) {
            const provider = await this.provider.getSigner();
            if (provider.provider.disconnect) {
                await provider.provider.disconnect();
            }
        }
        
        this.provider = null;
        this.signer = null;
        this.connectedAddress = null;
        this.chainId = null;
        
        document.getElementById('walletInfo').classList.remove('active');
        updateWalletButtonState('default');
        document.querySelector('.nft-grid').innerHTML = '';
    }
}

// Initialize Wallet Connection
async function initWalletConnection() {
    if (!window.walletManager) {
        window.walletManager = new WalletManager();
        await window.walletManager.init();
    }

    const connectBtn = document.getElementById('connectWalletBtn');
    connectBtn.addEventListener('click', () => window.walletManager.connectWallet());
    
    document.getElementById('disconnectWallet').addEventListener('click', () => window.walletManager.disconnectWallet());
    document.getElementById('copyAddress').addEventListener('click', () => {
        if (window.walletManager.connectedAddress) {
            navigator.clipboard.writeText(window.walletManager.connectedAddress);
            showTempMessage('Address copied to clipboard!');
        }
    });

    // Check if already connected
    if (window.ethereum && window.ethereum.selectedAddress) {
        await window.walletManager.handleAccountsChanged([window.ethereum.selectedAddress]);
    }
}

// Helper Functions
function showWalletError(message) {
    const errorDiv = document.createElement('div');
    errorDiv.className = 'wallet-error';
    errorDiv.innerHTML = `
        <i class="fas fa-exclamation-circle"></i>
        <span>${message}</span>
    `;
    
    const walletConnector = document.querySelector('.wallet-connector');
    walletConnector.appendChild(errorDiv);
    
    setTimeout(() => {
        gsap.to(errorDiv, {
            opacity: 0,
            onComplete: () => errorDiv.remove()
        });
    }, 5000);
}

function showTempMessage(message) {
    const msgDiv = document.createElement('div');
    msgDiv.className = 'temp-message';
    msgDiv.textContent = message;
    
    document.body.appendChild(msgDiv);
    gsap.from(msgDiv, { y: 20, opacity: 0 });
    setTimeout(() => {
        gsap.to(msgDiv, {
            y: -20,
            opacity: 0,
            onComplete: () => msgDiv.remove()
        });
    }, 2000);
}