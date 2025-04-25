$(() => {
  // Datepicker
  $("#birthday").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "1900:2024",
  });

  // Autocomplete and programming languages ​​list
  const programmingLanguages = [
    "ActionScript", "AppleScript", "ASP", "JavaScript", "Lisp", "Perl",
    "PHP", "Python", "Ruby", "Java", "C", "C++", "C#", "Swift", "Kotlin",
    "Go", "Rust", "TypeScript",
    "Dart", "Scala", "Elixir", "Haskell", "R", "MATLAB",
    "SQL", "Shell", "Bash", "Assembly", "VB.NET",
    "F#", "Objective-C", "Erlang", "Julia"
  ];

  // Autocomplete will be used for suggestions, but there will be no restrictions
  $("#programming").autocomplete({
    source: programmingLanguages
  });

  // Instant verification functions
  function validateProgramming() {
    // Just check if it is empty, any value can be entered
    if (!$("#programming").val()) {
      $("#programming").addClass("error");
      return false;
    } else {
      $("#programming").removeClass("error");
      return true;
    }
  }

  function validateEmail() {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!$("#email").val() || !emailRegex.test($("#email").val())) {
      $("#email").addClass("error");
      return false;
    } else {
      $("#email").removeClass("error");
      return true;
    }
  }

  function validateWebsite() {
    const urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-])\/?$/;
    if (!$("#website").val() || !urlRegex.test($("#website").val())) {
      $("#website").addClass("error");
      return false;
    } else {
      $("#website").removeClass("error");
      return true;
    }
  }

  // Event listeners for instant verification
  $("#programming").on("input change", validateProgramming);
  $("#email").on("input change", validateEmail);
  $("#website").on("input change", validateWebsite);

  // Form validation
  $("#myForm").on("submit", (event) => {
    event.preventDefault();
    let isValid = true;

    // Validate all fields
    if (!validateProgramming()) isValid = false;
    if (!validateEmail()) isValid = false;
    if (!validateWebsite()) isValid = false;

    if (!isValid) {
      alert("Please fill in the required fields correctly!");
    } else {
      alert("Form submitted successfully!");
      
      // Clear after form successfully submitted
      $("#myForm")[0].reset();
      
      // Clean up jQuery UI datepicker too
      $("#birthday").datepicker("setDate", null);
    }
  });
});