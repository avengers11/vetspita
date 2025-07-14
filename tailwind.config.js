/** @type {import('tailwindcss').Config} */
import flowbite from "flowbite/plugin";
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#5FC6CB",
                primary_dark: "#3CB3B9",
                secondary: "#5FC6CB",
                secondary_dark: "#3CB3B9",
                // primary: "#B0E0D2",
                // primary_dark: "#5DC0A3",
                // secondary: "#F68685",
                // secondary_dark: "#F46A67",
                dark: "#1C1D21",
                light: "#F8F8FF",
            },
        },
    },
    plugins: [flowbite],
};
