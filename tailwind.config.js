const colors = require('tailwindcss/colors')

module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    scale: {
      '0': '0',
      '25': '.25',
      '40': '.4',
      '50': '.5',
      '60':'.6',
      '75': '.75',
      '90': '.9',
      '95': '.95',
      '100': '1',
      '105': '1.05',
      '110': '1.1',
      '125': '1.25',
      '150': '1.5',
      '200': '2',
    },
    extend: {
    
      colors: {
        // Build your palette here
        red: {
          450: '#C70039'
        },
        yellow: {
          450: '#FF5733'
        },
        rose: colors.rose,
        orange: colors.orange,
        amber:colors.amber,
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
