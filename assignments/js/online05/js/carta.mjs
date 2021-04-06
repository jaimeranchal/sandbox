class Carta {
    constructor(palo, numero, puntos, imagen) {
        this.palo = palo;
        this.numero = numero;
        this.puntos = puntos;
        this.imagen = imagen;
    }

    getPalo() {
        return this.palo;
    }

    getNumero() {
        return this.numero;
    }

    getPuntos() {
        return this.puntos;
    }

    getImagen() {
        return this.imagen;
    }
}

export { Carta };
