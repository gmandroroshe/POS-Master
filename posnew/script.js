document.addEventListener("DOMContentLoaded", () => {
  const newSaleForm = document.getElementById("newSaleForm");

  if (newSaleForm) {
    newSaleForm.addEventListener("submit", (event) => {
      event.preventDefault();

      const formData = new FormData(newSaleForm);

      fetch("add_sale.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          alert(data);
          updateTotalSales("total-sales");
          newSaleForm.reset();
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    });
  }

  function updateTotalSales(elementId) {
    fetch("get_total_sales.php")
      .then((response) => response.text())
      .then((data) => {
        document.getElementById(elementId).innerText = `$${data}`;
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }

  // Initial load of total sales
  if (document.getElementById("total-sales")) {
    updateTotalSales("total-sales");
  }
  if (document.getElementById("total-sales-dashboard")) {
    updateTotalSales("total-sales-dashboard");
  }
});
// JavaScript to dynamically adjust sidebar height on scroll
window.addEventListener("scroll", function () {
  const sidebar = document.querySelector(".sidebar");
  if (sidebar) {
    const scrollY = window.scrollY;
    sidebar.style.height = `calc(100vh - ${scrollY}px)`;
  }
});

// JavaScript to toggle sidebar visibility
const sidebarToggleBtn = document.getElementById("sidebar-toggle");
const sidebar = document.querySelector(".sidebar");

if (sidebarToggleBtn && sidebar) {
  sidebarToggleBtn.addEventListener("click", function () {
    sidebar.classList.toggle("sidebar-hidden");
    const isSidebarHidden = sidebar.classList.contains("sidebar-hidden");
    document.querySelector(".main-content").style.marginLeft = isSidebarHidden
      ? "0"
      : "250px";
  });
}
