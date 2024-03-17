let button = document.getElementById("burger-button");
let sidebar = document.getElementById("sidebar");
let bars = [
    document.querySelector(".bar1"),
    document.querySelector(".bar2"),
    document.querySelector(".bar3"),
];
let isOpen = false;
let links = document.querySelectorAll(".link");
let arrows = document.querySelectorAll(".arrow");

// * PURCHASE ORDER
let purchaseOrder = document.getElementById("purchase-order");
let purchaseOrderContent = document.querySelector(".purchase-order");
let purchaseOrderArrow = document.querySelector(".purchase-order-arrow");
// * PURCHASE ORDER

// * SALES
let sales = document.getElementById("sales");
let salesContent = document.querySelector(".sales");
let salesArrow = document.querySelector(".sales-arrow");
// * SALES

// * INVENTORY
let inventory = document.getElementById("inventory");
let inventoryContent = document.querySelector(".inventory");
let inventoryArrow = document.querySelector(".inventory-arrow");
// * INVENTORY

// * HUMAN RESOURCE
let humanResource = document.getElementById("human-resource");
let humanResourceContent = document.querySelector(".human-resource");
let humanResourceArrow = document.querySelector(".human-resource-arrow");
// * HUMAN RESOURCE

// * ACCOUNTING AND FINANCE
let accounting = document.getElementById("accounting");
let accountingContent = document.querySelector(".accounting");
let accountingArrow = document.querySelector(".accounting-arrow");
// * ACCOUNTING AND FINANCE

document.addEventListener("DOMContentLoaded", function () {
    button.addEventListener("click", function () {
        isOpen = !isOpen;
        bars.forEach((bar) => {
            bar.classList.toggle("change", isOpen);
        });
        button.classList.toggle("change", isOpen);

        if (isOpen) {
            sidebar.classList.replace(
                "grid-template-col-0",
                "grid-template-col-1"
            );
        } else {
            sidebar.classList.replace(
                "grid-template-col-1",
                "grid-template-col-0"
            );
        }
    });

    toggleHumanResourceDropdown();
    toggleInventory();
    toggleSales();
    toggleAccounting();
    togglePurchaseOrder();
});

function toggleAccounting() {
    accounting.addEventListener("click", () => {
        if (accounting.classList.contains("active-link")) {
            accounting.classList.replace("active-link", "inactive-link");
            accountingArrow.classList.remove("-rotate-180");
            accountingContent.classList.replace(
                "grid-template-row-1",
                "grid-template-row-0"
            );
        } else {
            removeOtherToggle();
            links.forEach((link) => {
                link.classList.remove("current");
            });
            accounting.classList.add("current");
            accounting.classList.replace("inactive-link", "active-link");
            accountingArrow.classList.toggle("-rotate-180");
            accountingContent.classList.replace(
                "grid-template-row-0",
                "grid-template-row-1"
            );

            links.forEach((link) => {
                if (!link.classList.contains("current")) {
                    link.classList.remove("active-link");
                    link.classList.add("inactive-link");
                }
            });
        }
    });
}
function toggleSales() {
    sales.addEventListener("click", () => {
        if (sales.classList.contains("active-link")) {
            sales.classList.replace("active-link", "inactive-link");
            salesArrow.classList.remove("-rotate-180");
            salesContent.classList.replace(
                "grid-template-row-1",
                "grid-template-row-0"
            );
        } else {
            removeOtherToggle();
            links.forEach((link) => {
                link.classList.remove("current");
            });
            sales.classList.add("current");
            sales.classList.replace("inactive-link", "active-link");
            salesArrow.classList.toggle("-rotate-180");
            salesContent.classList.replace(
                "grid-template-row-0",
                "grid-template-row-1"
            );

            links.forEach((link) => {
                if (!link.classList.contains("current")) {
                    link.classList.remove("active-link");
                    link.classList.add("inactive-link");
                }
            });
        }
    });
}

function toggleHumanResourceDropdown() {
    humanResource.addEventListener("click", () => {
        if (humanResource.classList.contains("active-link")) {
            humanResource.classList.replace("active-link", "inactive-link");
            humanResourceArrow.classList.remove("-rotate-180");
            humanResourceContent.classList.replace(
                "grid-template-row-1",
                "grid-template-row-0"
            );
        } else {
            removeOtherToggle();
            links.forEach((link) => {
                link.classList.remove("current");
            });
            humanResource.classList.add("current");
            humanResource.classList.replace("inactive-link", "active-link");
            humanResourceArrow.classList.toggle("-rotate-180");
            humanResourceContent.classList.replace(
                "grid-template-row-0",
                "grid-template-row-1"
            );

            links.forEach((link) => {
                if (!link.classList.contains("current")) {
                    link.classList.remove("active-link");
                    link.classList.add("inactive-link");
                }
            });
        }
    });
}

function toggleInventory() {
    inventory.addEventListener("click", () => {
        if (inventory.classList.contains("active-link")) {
            inventory.classList.replace("active-link", "inactive-link");
            inventoryArrow.classList.remove("-rotate-180");
            inventoryContent.classList.replace(
                "grid-template-row-1",
                "grid-template-row-0"
            );
        } else {
            removeOtherToggle();
            links.forEach((link) => {
                link.classList.remove("current");
            });
            inventory.classList.add("current");
            inventory.classList.replace("inactive-link", "active-link");
            inventoryArrow.classList.toggle("-rotate-180");
            inventoryContent.classList.replace(
                "grid-template-row-0",
                "grid-template-row-1"
            );

            links.forEach((link) => {
                if (!link.classList.contains("current")) {
                    link.classList.remove("active-link");
                    link.classList.add("inactive-link");
                }
            });
        }
    });
}

function togglePurchaseOrder() {
    purchaseOrder.addEventListener("click", () => {
        if (purchaseOrder.classList.contains("active-link")) {
            purchaseOrder.classList.replace("active-link", "inactive-link");
            purchaseOrderArrow.classList.remove("-rotate-180");
            purchaseOrderContent.classList.replace(
                "grid-template-row-1",
                "grid-template-row-0"
            );
        } else {
            removeOtherToggle();
            links.forEach((link) => {
                link.classList.remove("current");
            });
            purchaseOrder.classList.add("current");
            purchaseOrder.classList.replace("inactive-link", "active-link");
            purchaseOrderArrow.classList.toggle("-rotate-180");
            purchaseOrderContent.classList.replace(
                "grid-template-row-0",
                "grid-template-row-1"
            );

            links.forEach((link) => {
                if (!link.classList.contains("current")) {
                    link.classList.remove("active-link");
                    link.classList.add("inactive-link");
                }
            });
        }
    });
}

function removeOtherToggle() {
    inventory.classList.replace("active-link", "inactive-link");
    inventoryArrow.classList.remove("-rotate-180");
    inventoryContent.classList.replace(
        "grid-template-row-1",
        "grid-template-row-0"
    );

    humanResource.classList.replace("active-link", "inactive-link");
    humanResourceArrow.classList.remove("-rotate-180");
    humanResourceContent.classList.replace(
        "grid-template-row-1",
        "grid-template-row-0"
    );

    sales.classList.replace("active-link", "inactive-link");
    salesArrow.classList.remove("-rotate-180");
    salesContent.classList.replace(
        "grid-template-row-1",
        "grid-template-row-0"
    );

    accounting.classList.replace("active-link", "inactive-link");
    accountingArrow.classList.remove("-rotate-180");
    accountingContent.classList.replace(
        "grid-template-row-1",
        "grid-template-row-0"
    );

    purchaseOrder.classList.replace("active-link", "inactive-link");
    purchaseOrderArrow.classList.remove("-rotate-180");
    purchaseOrderContent.classList.replace(
        "grid-template-row-1",
        "grid-template-row-0"
    );
}
