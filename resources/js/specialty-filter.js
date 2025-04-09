document.addEventListener("DOMContentLoaded", () => {
  const specialiteSelect = document.getElementById("specialite_id")
  const medecinSelect = document.querySelector('select[name="medecin_id"]')

  if (specialiteSelect && medecinSelect) {
    specialiteSelect.addEventListener("change", function () {
      const specialiteId = this.value
      const medecinOptions = medecinSelect.querySelectorAll("option")

      medecinOptions.forEach((option) => {
        if (option.value === "") return // Skip the placeholder option

        const medecinSpecialiteId = option.getAttribute("data-specialite")

        if (!specialiteId || medecinSpecialiteId === specialiteId) {
          option.style.display = ""
        } else {
          option.style.display = "none"
        }
      })

      // Reset doctor selection if the current selection is now hidden
      if (medecinSelect.selectedOptions[0].style.display === "none") {
        medecinSelect.value = ""
      }
    })
  }
})

