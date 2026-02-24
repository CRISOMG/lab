# 🧪 The Lab

¡Bienvenido al **Lab**! Este repositorio sirve como un espacio de experimentación, pruebas y aprendizaje activo continuo.

## 🎯 Objetivo del Proyecto

El propósito fundamental de este repositorio es proporcionar un entorno controlado para probar, analizar y comprender características específicas de diferentes lenguajes de programación, frameworks, bases de datos y herramientas de desarrollo.

En lugar de crear aplicaciones completas, aquí el objetivo es aislar conceptos (como la impedancia de datos, flujos de concurrencia, asincronismo funcional, manejo de memoria, etc.) para estudiarlos de forma profunda, "rompiéndolos" intencionalmente o explorando sus límites.

## 📂 Estructura del Repositorio

El repositorio está organizado en carpetas individuales por cada experimento. Cada carpeta debería ser lo más auto-contenida posible para facilitar su ejecución.

### Experimentos Actuales

1. **`php-pdo-experiment/`**:
   - **Objetivo**: Estudiar la [impedancia de datos](https://en.wikipedia.org/wiki/Object%E2%80%93relational_impedance_mismatch) y el comportamiento de los tipos de datos crudos (como booleanos y JSON) devueltos por la extensión PDO de PHP al comunicarse con diferentes motores de base de datos (MySQL vs PostgreSQL).
   - **Tecnologías**: PHP 8.2, PDO, MySQL 8.0, PostgreSQL 15, Docker.

_(A medida que se añadan nuevos experimentos, se documentarán en esta lista)._

---

## 🛠 Entorno de Ejecución

La forma preferida de ejecutar los experimentos en este repositorio es usando contenedores para no afectar el entorno de desarrollo local. Principalmente se utiliza:

- **Docker** y **Docker Compose**: Para orquestar bases de datos, redes locales y configuraciones de servidores específicas (C, PHP, Node, etc.).

Cada carpeta de experimento suele contener su propio `Dockerfile` o `docker-compose.yml`, además de las instrucciones específicas de cómo levantarlo.

## 📝 Reglas y Convenciones

Para mantener ordenado el historial y la documentación de este laboratorio, seguimos las siguientes prácticas:

- **Conventional Commits**: Obligatorio el uso estricto del formato `<tipo>[alcance opcional]: <descripción>`. Para los tipos, usamos `feat`, `fix`, `docs`, `chore`, `test`, etc. _(Puedes leer la guía completa en [docs/conventional-commits.md](./php-pdo-experiment/docs/conventional-commits.md))_.
- **Archivos Aislados**: Los nuevos experimentos no deben interferir con el código de otros experimentos, a menos que se trate de un proyecto iterativo explícito.

---

> "En la teoría, la teoría y la práctica son lo mismo. En la práctica, no lo son." - _Albert Einstein_
