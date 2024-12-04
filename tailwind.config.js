/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', 'sans-serif'], // Gunakan font Poppins
      },
      colors: {
        primary: '#4CAF50',
        secondary: '#FF5722',
      },
    },
  },
  plugins: [],
};