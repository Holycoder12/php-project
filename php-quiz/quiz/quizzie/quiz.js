
var quiz = {
   
    data: [
    {
      q : "Who is the prime minister of Nepal ?",
      o : [
        "KP Oli",
        "Balen Shah",
        "Sher Bahadur Deuba",
        "Dipendra Bir Bikram Shah"
      ],
      a : 2 
    },
    {
      q : "Who is the alpha male of this class?",
      o : [
        "Abhinav",
        "Pratyush",
        "Arpan",
        "Tatsam"
      ],
      a:1
    },
    {
      q : "Who is the best teacher for Mardi ?",
      o : [
        "Kusal Sir",
        "Sarak Sir",
        "Madhu Sir",
        "Sagina Maam"
      ],
      a : 2
    },
    {
      q : "Which is the seventh planet from the sun?",
      o : [
        "Uranus",
        "Earth",
        "Pluto",
        "Mars"
      ],
      a : 0
    },
    {
      q : "Which is the largest ocean on Earth?",
      o : [
        "Atlantic Ocean",
        "Indian Ocean",
        "Arctic Ocean",
        "Pacific Ocean"
      ],
      a : 3
    }
    ],
  
   
  
    
    now: 0, 
    score: 0, 
  
    
    init: () => {
      
      quiz.hWrap = document.getElementById("quizWrap");
  
      // q
      quiz.hQn = document.createElement("div");
      quiz.hQn.id = "quizQn";
      quiz.hWrap.appendChild(quiz.hQn);
  
      // a
      quiz.hAns = document.createElement("div");
      quiz.hAns.id = "quizAns";
      quiz.hWrap.appendChild(quiz.hAns);
  
      //start
      quiz.draw();
    },
  
    
    draw: () => {
      //q
      quiz.hQn.innerHTML = quiz.data[quiz.now].q;
  
      //o
      quiz.hAns.innerHTML = "";
      for (let i in quiz.data[quiz.now].o) {
        let radio = document.createElement("input");
        radio.type = "radio";
        radio.name = "quiz";
        radio.id = "quizo" + i;
        quiz.hAns.appendChild(radio);
        let label = document.createElement("label");
        label.innerHTML = quiz.data[quiz.now].o[i];
        label.setAttribute("for", "quizo" + i);
        label.dataset.idx = i;
        label.addEventListener("click", () => { quiz.select(label); });
        quiz.hAns.appendChild(label);
      }
    },
  

    select: (option) => {
     
      let all = quiz.hAns.getElementsByTagName("label");
      for (let label of all) {
        label.removeEventListener("click", quiz.select);
      }
  
    
      let correct = option.dataset.idx == quiz.data[quiz.now].a;
      if (correct) {
        quiz.score++;
        option.classList.add("correct");
      } else {
        option.classList.add("wrong");
      }
  
     
      quiz.now++;
      setTimeout(() => {
        if (quiz.now < quiz.data.length) { quiz.draw(); }
        else {
          quiz.hQn.innerHTML = `You have answered ${quiz.score} of ${quiz.data.length} correctly.`;
          quiz.hAns.innerHTML = "";
          
      const scoreVal = document.getElementById("scoreVal")
      scoreVal.value = quiz.score;

          let btnSubmit = document.getElementById("btnSubmit")
          btnSubmit.classList.remove("hidden");
          
          

        }
      }, 1000);
    },
  
   
    reset : () => {
      quiz.now = 0;
      quiz.score = 0;
      quiz.draw();
    }
  };
 
  

  
  setTimeout(quiz.init,2000)
