import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                Aldrich: ["Aldrich", "Helvetica", "sans-serif"],
            },
            colors: {
                green: "#2A645D",
                "dark-blue": "#1f4868",
                "light-orange": "#F4A46B",
                orange: "#F4874A",
                beige: "#E8E0D6",
                blue: "#001878",
            },
        },
    },

    plugins: [forms],
};
