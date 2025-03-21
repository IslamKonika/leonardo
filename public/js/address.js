// First, include the Google Places API in your HTML
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>

document.addEventListener('DOMContentLoaded', function() {
    const addressInput = document.querySelector('.address-input');

    // Create the autocomplete object, restricting to Canadian addresses
    const autocomplete = new google.maps.places.Autocomplete(addressInput, {
      componentRestrictions: { country: "ca" }  // This restricts to Canadian addresses only
    });

    // When a place is selected
    autocomplete.addListener('place_changed', function() {
      const place = autocomplete.getPlace();

      if (!place.geometry) {
        // User entered the name of a place that was not suggested
        console.log("No address details available for this input");
        return;
      }

      // You can access place details here
      console.log("Selected place:", place);

      // Enable the continue button
      document.querySelector('.continue-btn').style.backgroundColor = '#007bff';
    });

    // Prevent form submission when Enter is pressed in the input field
    addressInput.addEventListener('keydown', function(e) {
      if (e.key === 'Enter') {
        e.preventDefault();
      }
    });

    // Style customization for Google's autocomplete dropdown
    const styleSheet = document.createElement("style");
    styleSheet.innerText = `
      .pac-container {
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-top: 2px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
      }
      .pac-item {
        padding: 8px 10px;
        border-bottom: 1px solid #eee;
      }
      .pac-item:hover {
        background-color: #f5f5f5;
      }
      .pac-item-selected {
        background-color: #f0f7ff;
      }
    `;
    document.head.appendChild(styleSheet);
  });
