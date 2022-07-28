module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      zIndex: {
        "-1": "-1",
        "999": "999",
      },
      spacing: {
        128: '32rem', //standard = 32rem * 4 = 144
      },
      colors: {
        gray: {
          darkest: '#4B5563',
          darker: '#9CA3AF',
          dark: '#a8bfdb',
          DEFAULT: '#c0ccda',
          light: '#e0e6ed',
          lightest: '#f9fafc',
        },
        primary: {
          darkest: '#5858f1',
          dark: '#7575f1',
          DEFAULT: '#9A9AFF',
          light: '#a4a4fc',
          lightest: '#c0c0f3',
        },
        success: '#40d540',
        warning: '#eebf34',
        info: '#34cbee',
        error: '#e83b3b',
      },
      fontFamily: {
        'sans': ['Montserrat'],
      },
      outline: {
        blue: '2px solid #0F7BCC',
      },
      borderRadius: {
        'custom': '0 4px 4px 0',
      }
    },
  },
  variants: {
    extend: {
      width: ['group-hover'],
    },
  },
  plugins: [],
}
