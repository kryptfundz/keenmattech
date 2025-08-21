// Map functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mapEmbed = document.querySelector('.map-embed');
            const styleButtons = document.querySelectorAll('.map-style-btn');
            const geolocateBtn = document.getElementById('geolocate-btn');
            const toast = document.getElementById('toast');
            
            // Map style presets
            const mapStyles = {
                default: "grayscale(20%) invert(92%) hue-rotate(180deg) brightness(95%) contrast(90%)",
                dark: "grayscale(30%) invert(100%) hue-rotate(180deg) brightness(85%) contrast(90%)",
                light: "grayscale(50%) brightness(105%) contrast(90%)",
                blue: "grayscale(10%) invert(90%) hue-rotate(160deg) brightness(95%) saturate(120%)"
            };
            
            // Show toast notification
            function showToast(message, duration = 3000) {
                toast.textContent = message;
                toast.classList.add('show');
                
                setTimeout(() => {
                    toast.classList.remove('show');
                }, duration);
            }
            
            // Map style buttons functionality
            styleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    styleButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Apply the selected style
                    const filter = this.getAttribute('data-filter');
                    mapEmbed.style.filter = filter;
                    
                    // Show notification
                    const styleName = this.textContent.trim();
                    showToast(`Map style changed to ${styleName}`);
                });
            });
            
            // Geolocation functionality
            geolocateBtn.addEventListener('click', function() {
                if (!navigator.geolocation) {
                    showToast('Geolocation is not supported by your browser', 4000);
                    return;
                }
                
                // Show loading state
                geolocateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                showToast('Detecting your location...', 2000);
                
                // Get current position
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        // Success callback
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;
                        
                        // Update button icon
                        geolocateBtn.innerHTML = '<i class="fas fa-location-arrow"></i>';
                        
                        // Show success message
                        showToast('Location detected successfully!', 3000);
                        
                        // In a real implementation, you would update the map with the new coordinates
                        console.log('Detected location:', latitude, longitude);
                        
                        // For demo purposes, we'll just show a message
                        showToast(`Location: ${latitude.toFixed(4)}, ${longitude.toFixed(4)}`, 4000);
                    },
                    function(error) {
                        // Error callback
                        geolocateBtn.innerHTML = '<i class="fas fa-location-arrow"></i>';
                        
                        let errorMessage;
                        switch(error.code) {
                            case error.PERMISSION_DENIED:
                                errorMessage = "Location access denied by user";
                                break;
                            case error.POSITION_UNAVAILABLE:
                                errorMessage = "Location information unavailable";
                                break;
                            case error.TIMEOUT:
                                errorMessage = "Location request timed out";
                                break;
                            case error.UNKNOWN_ERROR:
                                errorMessage = "An unknown error occurred";
                                break;
                        }
                        
                        showToast(errorMessage, 4000);
                    },
                    {
                        enableHighAccuracy: true,
                        timeout: 10000,
                        maximumAge: 60000
                    }
                );
            });

        });