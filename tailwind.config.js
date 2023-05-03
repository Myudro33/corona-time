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
        'lg': '1025px'
        // => @media (min-width: 375px) { ... }
      },
      boxShadow: {
        'bd': '-3px 3px 0px #DBE8FB, -3px -3px 0px #DBE8FB, 3px -3px 0px #DBE8FB, 3px 3px 0px #DBE8FB, 3px 3px 0px #DBE8FB;',
      },
      borderColor:{
        'error': '#CC1E1E',
        'success': '#249E2C'
      }
    },
  },
  plugins: [],
}