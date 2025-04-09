document.addEventListener("DOMContentLoaded", () => {
    // Listen for modal open events
    window.addEventListener("open-modal", (event) => {
      if (event.detail && event.detail.content) {
        // Dispatch the event to Alpine.js
        window.dispatchEvent(
          new CustomEvent("open-modal", {
            detail: {
              content: event.detail.content,
            },
          }),
        )
      }
    })
  
    // Listen for modal close events
    window.addEventListener("close-modal", () => {
      window.dispatchEvent(new CustomEvent("close-modal"))
    })
  
    // Close modal when clicking outside or pressing escape
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        window.dispatchEvent(new CustomEvent("close-modal"))
      }
    })
  })
  
  