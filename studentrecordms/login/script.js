    function toggleForm() {
      const login = document.getElementById("loginForm");
      const signup = document.getElementById("signupForm");
      
      if (login.style.display === "none") {
        login.style.display = "block";
        signup.style.display = "none";
      } else {
        login.style.display = "none";
        signup.style.display = "block";
      }
    }
    