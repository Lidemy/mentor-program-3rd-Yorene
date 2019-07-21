/* eslint-env jquery */

$('.btn-primary').click(
  () => {
    // console.log($('input[type=text]').val());
    const item = "<li class='list-group-item'> <input class='check' type='checkbox'> <span> {{item}} </span> <button class='btn btn-outline-primary'>X</button> </li>";
    const newItem = item.replace('{{item}}', $('input[type=text]').val());
    $('.list-group').append(newItem);
  },
);

$('.list-group').click(
  (eventData) => {
    // console.log(eventData.target);

    if (eventData.target.classList.contains('check')) {
      $(eventData.target).closest('.list-group-item').toggleClass('done');
    }

    if (eventData.target.classList.contains('btn-outline-primary')) {
      $(eventData.target).closest('.list-group-item').remove();
    }
  },
);
