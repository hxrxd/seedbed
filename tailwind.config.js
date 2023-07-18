const colors = require('tailwindcss/colors')

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './src/**/*.{html,js}',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },

    colors: {
              transparent: 'transparent',
              current: '#d6df23',
              'white': '#ffffff',
              'purple': '#652c90',
              'midnight': '#121063',
              'metal': '#565584',
              'tahiti': '#3ab7bf',
              'silver': '#ecebff',
              'bubble-gum': '#ff77e9',
              'bermuda': '#78dcca',
              'primary': '#d6df23',
            },
    },



    plugins: [
        forms,
        require('flowbite/plugin'),
    ],

};



