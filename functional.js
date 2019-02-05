  
  

  
 
  function check() {
	    const gender = document.forms["Search"]["gender"].value; 
		const Exp = document.forms["Search"]["experience"].value;
		 
	  
	 
	
		  if (!document.Search.gender[0].checked && !document.Search.gender[1].checked) {
		  alert("please select a gender");
		  return false;
	  }
	    else if (!document.Search.experience[0].checked && !document.Search.experience[1].checked && !document.Search.experience[2].checked && !document.Search.experience[3].checked) {
			
			alert("please select an option for Experience");
		  return false;
			
		}
		else {
			alert("Thank you, please click ok to see your results");
			alert(gender.value);
			alert(exp.value);
			return true;
			//location.href = "star.html";
			
		}
		
		}
	
		
  
 
  
  function calculate()  {
	  
	 
	  
	 
	  const job = document.forms.Search.gender;
	  const genderValue ="";
	  for (i = 0; i < job.length; i++) {
		  
		if   (!job[i].checked) {
			
			alert("FAIL");
			
		}
    else if (job[i].checked) {
	genderValue = job[i].value;
	 prompt(genderValue);
	}
	
	  }
	  
	const years = document.forms.Search.experience;
	const expValue = "";
	for (i = 0; i < years.length; i++)
	if (years[i].checked) {
	expValue = years[i].value;
	 prompt(expValue);
	}
	
/*
	 const jobRole = document.forms["Search"]["role"].value;
	  prompt(jobRole);
	
	  */
	 
	 
	  
	  
  };
  

 
 
  
  
  
  /*
  
  function Driver(FullName, Role, AgeRange, Gender, Experience, DateOfBirth ) {

		 this.FullName = FullName;
         this.Role = Role;
         this.AgeRange = AgeRange;
		 this.Gender = Gender;
		 this.Experience = Experience;
		 this.DateOfBirth = DateOfBirth;
    
     }
     var Transport = [];

     //here is all the data processed from whatever the user selects from the form, this will display the result one the user clicks submit according to the preferences selected
     Transport.push(new Driver("Chris Dyer",'CatB', 18-24, 'male', '2-3 years', "10/12/1980"));
	 Transport.push(new Driver("James Green",'Class2', 18-24, 'male', '2-3 years', "21/05/1985"));
	 Transport.push(new Driver("Michael Bax",'Class2', "25+", 'male', '1-2 years', "12/06/1982"));
	 Transport.push(new Driver("Gemma Cutt","forklift", "25+", 'female', '3years+', "09/01/1979"));
	 
	 
	 
	 
	 */
	 