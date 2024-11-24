document.querySelector("input").addEventListener("change", function () {

    if (this.files[0]) {
      var fr = new FileReader();
    
      fr.addEventListener("load", function () {
        document.querySelector("label").style.backgroundImage = "url(" + fr.result + ")";
      }, false);
  
      fr.readAsDataURL(this.files[0]);
    }
  });