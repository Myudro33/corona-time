/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      screens: {
        'xs': '375px',
        // => @media (min-width: 375px) { ... }
      },
    },
  },
  plugins: [],
}