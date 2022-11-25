function traiterEmail() {
  let email = document.getElementById("email").value;

  if (email == "") {
    document.getElementById("email").style.backgroundColor = "#e24d36";
  } else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
    document.getElementById("email").style.backgroundColor = "#71bf71";
  } else {
    document.getElementById("email").style.backgroundColor = "#e24d36";
  }
}


function traiterNom() {
    let nom = document.getElementById("nom").value;

    if (nom == "") {
        document.getElementById("nom").style.backgroundColor = "#e24d36";
    } else {
        document.getElementById("nom").style.backgroundColor = "#71bf71";
    }
}


function traiterPrenom() {
    let prenom = document.getElementById("prenom").value;

    if (prenom == "") {
        document.getElementById("prenom").style.backgroundColor = "#e24d36";
    } else {
        document.getElementById("prenom").style.backgroundColor = "#71bf71";
    }
}


function traiterMdp() {
    let mdp = document.getElementById("mdp").value;

    if (mdp == "") {
        document.getElementById("mdp").style.backgroundColor = "#e24d36";
    } else {
        document.getElementById("mdp").style.backgroundColor = "#71bf71";
    }
}


function traiterTel() {
    let tel = document.getElementById("tel").value;

    if (tel == "") {
        document.getElementById("tel").style.backgroundColor = "#e24d36";
    } else {
        document.getElementById("tel").style.backgroundColor = "#71bf71";
    }
}
