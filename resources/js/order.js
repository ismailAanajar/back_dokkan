import axios from 'axios';

const orderStatus = document.getElementById('order_status')

orderStatus.addEventListener('change', function(e) {
  console.log(e.target.value);
  axios.post('/orders/change_status/'+this.dataset.id, {
    status: e.target.value
  })
})