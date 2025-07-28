import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: ["./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php", "./storage/framework/views/*.php", "./resources/views/**/*.blade.php"],

    theme: {
        extend: {
            fontFamily: {
                plusJakartaSans: ["Plus Jakarta Sans", "sans-serif"],
            },
            colors: {
                primary: "#3986a3",
            },
        },
    },

    safelist: [
        "bg-[#3fa2f6]",
        "bg-[#fbb03b]",
        "bg-[#406c9b]",
        "bg-[#6a3d00]",
        "bg-[#ef5350]",
        "bg-[#4caf50]",
        {
            pattern: /^col-span-(\d+)$/,
            variants: ["sm", "md", "lg", "xl"],
        },
    ],

    plugins: [forms, typography],
};
