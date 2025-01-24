document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll(".tabs .tab");
    const tabContents = document.querySelectorAll(".tab-content > div");
  
    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        // Remove active class from all tabs
        tabs.forEach((t) => t.classList.remove("active"));
  
        // Add active class to the clicked tab
        tab.classList.add("active");
  
        // Get the target category from the clicked tab
        const target = tab.dataset.tabTarget;
  
        // Show/Hide tab content based on the selected tab
        tabContents.forEach((content) => {
          if (`#${content.id}` === target) {
            content.classList.add("active"); // Show matching content
            content.style.display = "block"; // Ensure visibility
          } else {
            content.classList.remove("active"); // Hide non-matching content
            content.style.display = "none"; // Ensure it stays hidden
          }
        });
      });
    });
  
    // Trigger the click on the first tab to show content initially
    tabs[0].click();
  });
  