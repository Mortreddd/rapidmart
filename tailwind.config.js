module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#799CF0",
                secondary: "#2A42C0",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
