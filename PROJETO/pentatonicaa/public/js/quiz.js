const quizData = [
    {
      question: "Qual estilo musical você mais curte?",
      answers: [
        { text: "Rock clássico (Led Zeppelin, Queen)", guitar: "Les Paul" },
        { text: "Blues (BB King, Eric Clapton)", guitar: "Stratocaster" },
        { text: "Metal (Metallica, Iron Maiden)", guitar: "Superstrato" },
        { text: "Indie / Alternativo (Arctic Monkeys, The Strokes)", guitar: "Telecaster" }
      ]
    },
    {
      question: "Que tipo de som você prefere?",
      answers: [
        { text: "Gordo e encorpado", guitar: "Les Paul" },
        { text: "Brilhante e limpo", guitar: "Stratocaster" },
        { text: "Pesado e agressivo", guitar: "Superstrato" },
        { text: "Crocrante e seco", guitar: "Telecaster" }
      ]
    },
    {
      question: "Você prefere solos ou bases?",
      answers: [
        { text: "Solos", guitar: "Superstrato" },
        { text: "Bases", guitar: "Telecaster" },
        { text: "Os dois!", guitar: "Stratocaster" },
        { text: "Riffs pesados", guitar: "Les Paul" }
      ]
    },
    {
      question: "Visual da guitarra importa pra você?",
      answers: [
        { text: "Sim, quero algo chamativo", guitar: "Superstrato" },
        { text: "Prefiro o clássico", guitar: "Les Paul" },
        { text: "Gosto de algo clean e elegante", guitar: "Stratocaster" },
        { text: "Algo vintage é minha praia", guitar: "Telecaster" }
      ]
    },
    {
      question: "Você quer tocar em qual contexto?",
      answers: [
        { text: "Banda de rock", guitar: "Les Paul" },
        { text: "Tocar em casa", guitar: "Stratocaster" },
        { text: "Show de metal", guitar: "Superstrato" },
        { text: "Projetos autorais indie", guitar: "Telecaster" }
      ]
    }
  ];
  
  let currentQuestion = 0;
  let guitarScores = {};
  
  const questionEl = document.getElementById('question');
  const answersEl = document.getElementById('answers');
  const nextBtn = document.getElementById('next-btn');
  
  function showQuestion() {
    resetState();
    let q = quizData[currentQuestion];
    questionEl.innerText = q.question;
    q.answers.forEach(answer => {
      const btn = document.createElement('button');
      btn.innerText = answer.text;
      btn.classList.add('answer-btn');
      btn.addEventListener('click', () => selectAnswer(answer.guitar));
      answersEl.appendChild(btn);
    });
  }
  
  function resetState() {
    nextBtn.style.display = 'none';
    answersEl.innerHTML = '';
  }
  
  function selectAnswer(guitar) {
    guitarScores[guitar] = (guitarScores[guitar] || 0) + 1;
    nextBtn.style.display = 'block';
  }
  
  nextBtn.addEventListener('click', () => {
    currentQuestion++;
    if (currentQuestion < quizData.length) {
      showQuestion();
    } else {
      showResult();
    }
  });
  
  function showResult() {
    resetState();
    questionEl.innerText = "Sua guitarra ideal é:";
  
    const topGuitar = Object.keys(guitarScores).reduce((a, b) => 
      guitarScores[a] > guitarScores[b] ? a : b
    );
  
    const resultDiv = document.createElement('div');
    resultDiv.innerHTML = `<h2>${topGuitar}</h2>`;
  
    answersEl.appendChild(resultDiv);
  }
  
  showQuestion();
  