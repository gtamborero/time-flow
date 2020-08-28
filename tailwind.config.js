module.exports = {
  theme: {
    extend: {},
    colors: {
      primary: '#2a4365',
      'primary-light': '#3a5375',
      secondary: '#f2f2f2',
      'secondary-light': '#fff',
      white: '#fff',
      black: '#000',
      'gray-100': '#F7FAFC',
      'gray-200': '#EDF2F7',
      'gray-300': '#E2E8F0',
      'gray-400': '#CBD5E0',
      'red': '#d43f11',
      'green': '#599f13',
      'orange': '#de8316'
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/custom-forms')
  ]
}
