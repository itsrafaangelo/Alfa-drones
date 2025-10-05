import forms from "@tailwindcss/forms";
import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    safelist: [
        "bg-gradient-to-br",
        "from-gray-50",
        "via-white",
        "to-gray-50",
        "to-gray-100",
        "from-gray-100",
        "rounded-3xl",
        "backdrop-blur-sm",
        "bg-white/90",
        "bg-white/50",
        "text-transparent",
        "bg-clip-text",
        "bg-gradient-to-r",
        "from-red-500",
        "to-red-600",
        "to-red-700",
        "via-red-600",
        "hover:scale-[1.02]",
        "active:scale-[0.98]",
        "hover:scale-105",
        "active:scale-95",
        "group-hover:scale-110",
        "group-hover:translate-x-1",
        "group-hover/btn:translate-x-1",
        "translate-x-[-100%]",
        "group-hover/btn:translate-x-[100%]",
        "line-clamp-2",
        "shadow-red-500/20",
        "shadow-red-500/25",
        "border-white/20",
        "from-red-200",
        "to-red-300",
        "from-blue-200",
        "to-blue-300",
        "from-gray-300",
        "to-gray-400",
        "animate-pulse",
        "shadow-2xl",
        "hover:shadow-2xl",
        "text-5xl",
        "md:text-7xl",
        "hover:border-red-500",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
