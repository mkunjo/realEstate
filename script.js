document.addEventListener("DOMContentLoaded", function() {
  // Get references to the input elements
  const propertyCostInput = document.getElementById("price");
  const propertyTaxInput = document.getElementById("property_tax");

  // Function to calculate property tax and update the tax input field
  function calculatePropertyTax() {
    const propertyCost = parseFloat(propertyCostInput.value.replace(/,/g, ""));
    if (!isNaN(propertyCost)) {
      const propertyTax = propertyCost * 0.07; // 7% of property cost
      propertyTaxInput.value = propertyTax.toFixed(2);
    } else {
      propertyTaxInput.value = ""; // Clear the tax field if property cost is not a valid number
    }
  }

  // Add event listener to the property cost input
  propertyCostInput.addEventListener("input", calculatePropertyTax);
  // Trigger the property tax calculation when the page loads
  calculatePropertyTax();
});
  function addProperty(event) {
    event.preventDefault();

    
    const price = document.getElementById("price").value;
    const location = document.getElementById("location").value;
    const age = document.getElementById("age").value;
    const floorPlan = document.getElementById("floorPlan").value;
    const bedrooms = document.getElementById("bedrooms").value;
    const bathrooms = document.getElementById("bathrooms").value;

    
    const newProperty = {
      price: price,
      location: location,
      age: age,
      floorPlan: floorPlan,
      bedrooms: bedrooms,
      bathrooms: bathrooms,
    };

    
  }

  
  const addPropertyForm = document.getElementById("addPropertyForm");
  addPropertyForm.addEventListener("submit", addProperty);



 
  function editProperty(event) {
    event.preventDefault();

    
    const propertyId = document.getElementById("propertyId").value;
    const price = document.getElementById("price").value;
    const location = document.getElementById("location").value;
    const age = document.getElementById("age").value;
    const floorPlan = document.getElementById("floorPlan").value;
    const bedrooms = document.getElementById("bedrooms").value;
    const bathrooms = document.getElementById("bathrooms").value;

    
    const updatedProperty = {
      id: propertyId,
      price: price,
      location: location,
      age: age,
      floorPlan: floorPlan,
      bedrooms: bedrooms,
      bathrooms: bathrooms,
    };

    
  }

  
  const editPropertyForm = document.getElementById("editPropertyForm");
  editPropertyForm.addEventListener("submit", editProperty);

  function viewDetails(propertyId) {
    window.location.href = `view_propertyDetails.html?id=${propertyId}`;
  }

  
  const viewDetailsLinks = document.querySelectorAll('.view-details-link');
  viewDetailsLinks.forEach(link => {
    link.addEventListener('click', (event) => {
      event.preventDefault();
      const propertyId = link.getAttribute('data-property-id');
      viewDetails(propertyId);
    });
  });
  
  
  
  document.addEventListener("DOMContentLoaded", function() {
  // Function to fetch property data and create property cards
  function createPropertyCards() {
    // Fetch property data from the backend using Fetch API or XMLHttpRequest
    // Replace 'your-php-script.php' with the actual path to your PHP script that fetches property data
    fetch('your-php-script.php')
      .then(response => response.json())
      .then(data => {
        // Get the container element where property cards will be displayed
        const propertyCardsContainer = document.getElementById("propertyCardsContainer");

        // Loop through the data and create property cards
        data.forEach(property => {
          // Create the HTML elements for the property card
          const propertyCard = document.createElement("div");
          propertyCard.className = "property-card";
          
          const image = document.createElement("img");
          image.src = property.image_url;
          image.alt = "Property Image";
          propertyCard.appendChild(image);

          const priceHeading = document.createElement("h2");
          priceHeading.textContent = "Price: $" + property.price;
          propertyCard.appendChild(priceHeading);

          const locationParagraph = document.createElement("p");
          locationParagraph.textContent = "Property Location: " + property.location;
          propertyCard.appendChild(locationParagraph);

          const ageParagraph = document.createElement("p");
          ageParagraph.textContent = "Age: " + property.age + " years";
          propertyCard.appendChild(ageParagraph);

          // ... Add more paragraphs for other property details (floor plan, bedrooms, bathrooms, etc.)

          // Append the property card to the container
          propertyCardsContainer.appendChild(propertyCard);
        });
      })
      .catch(error => {
        console.error("Error fetching property data:", error);
      });
  }

  // Call the function to create property cards when the page loads
  createPropertyCards();
});