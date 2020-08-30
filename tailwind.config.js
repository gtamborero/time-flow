module.exports = {
  theme: {
    extend: {},
    colors: {
      primary: 'var(--color1)',
      'primary-light': '#3a5375',
      secondary: 'var(--color2)',
      'secondary-light': '#fff',
      white: '#fff',
      black: '#000',
      'gray-100': '#F7FAFC',
      'gray-200': '#EDF2F7',
      'gray-300': '#E2E8F0',
      'gray-400': '#CBD5E0',
      'gray': '#333',
      'red': '#b00e0e',
      'green': '#50920f',
      'orange': '#cd7914'
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/custom-forms')
  ]
}
