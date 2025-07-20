<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Celebración Animada!</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Evita el scroll cuando el confeti se desborda */
        }
        .celebration {
            background-color: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 100px auto;
            position: relative;
            z-index: 1; /* Asegura que el contenido esté sobre el confeti */
        }
        h1 {
            color: #e91e63; /* Color festivo */
            font-size: 3em;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            line-height: 1.6;
            color: #333;
        }
        .confetti-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none; /* Permite interactuar con el contenido debajo */
        }
        .confetti {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            position: absolute;
            animation: confetti-fall 5s linear infinite;
        }
        @keyframes confetti-fall {
            0% { transform: translateY(-10px) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="celebration">
        <h1>Excelente!</h1>
        <p>¡Operacion hecha con exito!</p>
        <p>Seras redireccionado.</p>
    </div>

    <div class="confetti-container"></div>

    <script>
        const confettiContainer = document.querySelector('.confetti-container');
        const colors = ['#fce18a', '#ff726d', '#b484f0', '#95e36e']; // Colores del confeti

        function createConfetti() {
            const confetti = document.createElement('div');
            confetti.classList.add('confetti');
            confetti.style.left = `${Math.random() * 100}vw`;
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            confetti.style.animationDuration = `${Math.random() * 3 + 2}s`; // Duración aleatoria
            confetti.style.animationDelay = `${Math.random()}s`; // Retardo aleatorio
            confettiContainer.appendChild(confetti);

            // Elimina el confeti después de que termine la animación
            confetti.addEventListener('animationiteration', () => {
                confetti.remove();
            });
        }

        // Crea confeti cada 50 milisegundos
        setInterval(createConfetti, 50);

        setTimeout(() => {
            location.href ="https://consorciomiremas.org/";
        }, 3000);
    </script>
</body>
</html>