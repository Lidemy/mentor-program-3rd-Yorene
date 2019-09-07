/* eslint-env jquery */

const listHtml = "<li class='list-group-item d-flex align-items-center'> <input class='check' type='checkbox'> <span class='flex-grow-1'> {{item}} </span> <button class='btn btn-outline-primary' data = {{number}}>X</button> </li>";

const list = [
  'Daydream', 'Complete The Keynote', 'Prepare Presentation', 'Dinner',
];

function showlist() {
  $('.list-group').empty();
  for (let i = 0; i < list.length; i += 1) {
    const newItem = listHtml.replace('{{item}}', list[i])
      .replace('{{number}}', i);
    $('.list-group').append(newItem);
  }
}

showlist();

$('.btn-primary').click(
  () => {
    // console.log($('input[type=text]').val());
    // week13 use DOM
    /*
    const item =
     "<li class='list-group-item'>
     <input class='check' type='checkbox'> <span> {{item}} </span>
     <button class='btn btn-outline-primary'>X</button>
      </li>";
    */
    // const newItem = item.replace('{{item}}', $('input[type=text]').val());
    // $('.list-group').append(newItem);

    // week18 use render
    const addItem = $('input[type=text]').val();
    list.push(addItem);
    showlist();
  },
);

$('.list-group').click(
  (eventData) => {
    // console.log(eventData.target);

    if (eventData.target.classList.contains('check')) {
      $(eventData.target).closest('.list-group-item').toggleClass('done');
    }

    if (eventData.target.classList.contains('btn-outline-primary')) {
      // week13 use DOM
      // $(eventData.target).closest('.list-group-item').remove();

      // week18 use render
      // console.log($(eventData.target).closest('.btn-outline-primary').attr('data'));
      const number = $(eventData.target).closest('.btn-outline-primary').attr('data');
      list.splice(number, 1);
      showlist();
    }
  },
);
