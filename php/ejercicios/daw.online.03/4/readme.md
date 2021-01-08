# Cuentas personales

Crea un balance sencillo de ingresos y gastos.

- Para obtener el balance, habrá que 
    - registrarse como usuario en una base de datos 
    - y después iniciar sesión;
- las contraseñas estarán almacenadas en *hash* mediante el algoritmo [Bcrypt](https://en.wikipedia.org/wiki/Bcrypt); usa:
    - [*password_hash*](https://www.php.net/manual/en/function.password-hash.php) 
    - y [*password_verify*](https://www.php.net/manual/en/function.password-verify.php)). 
- Una vez iniciada la sesión correctamente,
    - el usuario introducirá, mediante formularios, una serie de ingresos y gastos,
    - pulsará en *Generar* y
    - verá un informe similar a [éste](https://milq.github.io/cursos/dwes/ud/3/balance.png) en PDF.
        - Usa [MPDF](https://github.com/mpdf/mpdf), instalálo con [Composer](https://getcomposer.org/) 
- aloja esta aplicación web en Heroku (opcional) 
- aloja la aplicación en GitHub (captura del repositorio privado).
