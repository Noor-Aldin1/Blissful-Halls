import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./*.html",
        "./src/**/*.{html,js}", // Added from the second config
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins'],
                roboto: ['Roboto'],
            },
            colors: {
                primary: '#FD3D57',
            },
            screens: {
                sm: '576px',
                md: '768px',
                lg: '992px',
                xl: '1200px',
            },
            container: {
                center: true,
                padding: '1rem',
            },
        },
    },
    plugins: [
        forms,
    ],
};
