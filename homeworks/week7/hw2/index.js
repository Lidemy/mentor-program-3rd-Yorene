const apllicationForm = document.querySelector('.apllication-form');
apllicationForm.addEventListener('submit', (e) => {
  let result = true;

  // error
  function unqualified(parent, message) {
    // bgc
    parent.classList.add('double__checked');
    // text
    const unsuccess = document.createElement('div');
    unsuccess.classList.add('unsuccess');
    unsuccess.classList.add('must');
    unsuccess.innerText = message;
    parent.appendChild(unsuccess);
    e.preventDefault();

    result = false;
  }

  // 不留白
  const elements = document.querySelectorAll('input[type=text]');
  for (let i = 0; i < elements.length; i += 1) {
    if (elements[i].value === '') {
      unqualified(elements[i].closest('div'), '這是必填問題');
    }
  }

  // e@g.com
  const emailelement = document.querySelector('input[name=email]');
  if (emailelement.value.includes('@')) {
    const index = emailelement.value.indexOf('@');
    // 為何打三個等號會不能過呢？
    if (index !== 0 && emailelement.value.includes('.com', (index + 2)) === true) {
      // alert(emailelement.value);
    } else {
      unqualified(emailelement.closest('div'), '請輸入有效的電子郵件地址');
    }
  } else {
    unqualified(emailelement.closest('div'), '請輸入有效的電子郵件地址');
  }

  const class1 = document.querySelector('#class1');
  const class2 = document.querySelector('#class2');
  if (class1.checked || class2.checked) {
    // alert(`class1 ${class1.checked}`);
    // alert(`class2 ${class2.checked}`);
  } else {
    unqualified(document.querySelector('.type'), '這是必填問題');
  }

  if (result) {
    alert('我們已經收到您回覆的表單。');
    console.log(emailelement.value);
    console.log(`class1 ${class1.checked}`);
    console.log(`class2 ${class2.checked}`);
    for (let i = 0; i < elements.length; i += 1) {
      console.log(elements[i].value);
    }
    if (document.querySelector('input[name=optional]') !== '') {
      console.log(document.querySelector('input[name=optional]').value);
    }
  }
});
