<script>
export default {
 state: {
   exchange:window.iproexchange
 },
 mutations: {
   setStatus (state, payload) {
     state.exchange[payload.id].status = payload.status;
   },
   setRating (state, payload) {
     state.exchange[payload.id].rating = payload.rating;
   },
   setComment (state, payload) {
     state.exchange[payload.id].comment = payload.comment;
   },
 },
 getters: {
     getStatus: (state) => (id) => {
       return state.exchange[id].status;
     },
    getRating: (state) => (id) => {
      return state.exchange[id].rating;
    },
    getComment: (state) => (id) => {
      return state.exchange[id].comment;
    },
  }
};
</script>
