<script>
export default {
 state: {
   exchange:window.iproexchange
 },
 mutations: {
   setRating (state, payload) {
     state.exchange[payload.id].rating = payload.rating;
   },
   setComment (state, payload) {
     state.exchange[payload.id].comment = payload.comment;
   },
 },
 getters: {
    getRating: (state) => (id) => {
      return state.exchange[id].rating;
    },
    getComment: (state) => (id) => {
      return state.exchange[id].comment;
    },
  }
};
</script>
