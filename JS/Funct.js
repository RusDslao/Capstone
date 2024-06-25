document.addEventListener("DOMContentLoaded", function() {
    const radioButtons = document.querySelectorAll('input[name="choice"]');
    
    radioButtons.forEach(radioButton => {
      radioButton.addEventListener('change', () => {
        if (radioButton.checked) {
          const selectedValue = radioButton.value;
          let url;
          
          switch (selectedValue) {
            case 'option1':
              url = 'http://127.0.0.1:5500/MonalisaReg01.html';
              break;
            case 'option2':
              url = 'http://127.0.0.1:5500/Existpage.html';
              break;
            default:
              break;
          }
          
          if (url) {
            window.open(url, '_blank');
          }
        }
      });
    });
  });


  
  