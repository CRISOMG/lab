# Guía de Conventional Commits

[Conventional Commits](https://www.conventionalcommits.org/) es una convención sencilla y estandarizada sobre cómo escribir mensajes de commit. Está diseñada para facilitar la comprensión del historial del proyecto tanto para humanos como para herramientas automatizadas.

Al adoptar esta convención, es mucho más fácil crear herramientas para generar el changelog automáticamente, determinar el siguiente número de versión semántica (SemVer), y comunicar claramente a tus compañeros de equipo (y a tu yo del futuro) la naturaleza de los cambios.

## Estructura del Mensaje de Commit

El mensaje de commit debe estar estructurado de la siguiente forma:

```
<tipo>[alcance opcional]: <descripción>

[cuerpo opcional]

[pie opcional]
```

### 1. El Tipo (Type)

El tipo es obligatorio e indica la intención del cambio. Los más comunes son:

- **`feat`**: Una nueva característica o funcionalidad. (Correlaciona con `MINOR` en Semantic Versioning).
- **`fix`**: Solución de un error o bug. (Correlaciona con `PATCH` en Semantic Versioning).
- **`docs`**: Cambios que afectan únicamente a la documentación.
- **`style`**: Cambios que no afectan el significado del código (espaciado, formateo, punto y coma faltante, etc). **Ojo, no se refiere a CSS**.
- **`refactor`**: Un cambio en el código que no soluciona un bug ni añade una funcionalidad, sino que mejora su estructura interna.
- **`perf`**: Un cambio en el código que mejora el rendimiento de la aplicación.
- **`test`**: Añadir pruebas faltantes o corregir pruebas existentes.
- **`build`**: Cambios que afectan el sistema de construcción o dependencias externas (ejemplos: npm, pip, docker, etc)
- **`ci`**: Cambios en los archivos y scripts de configuración del sistema de Integración Continua (ejemplos: Travis, GitHub Actions, GitLab CI, etc).
- **`chore`**: Tareas de mantenimiento general, actualización de dependencias, etc. Tareas que no modifican código `src` ni `test`.
- **`revert`**: Revierte un commit anterior.

### 2. El Alcance (Scope) - (Opcional)

El alcance provee contexto adicional sobre qué parte de la base de código se está modificando. Se escribe entre paréntesis inmediatamente después del tipo.

Ejemplos:

- `feat(auth): add login with google`
- `fix(parser): resolve null pointer exception`
- `refactor(database): migrate to PDO`

### 3. La Descripción (Description)

Una descripción corta y concisa del cambio.

- Usa el modo imperativo y tiempo presente: "add" en lugar de "added" o "adds". (Como si estuvieras dando una orden al código).
- No uses mayúscula al inicio.
- No coloques un punto al final.

### 4. El Cuerpo (Body) - (Opcional)

Justifica el cambio y describe el problema que soluciona. Resalta la motivación detrás del cambio en lugar de explicar el "cómo", ya que el código debe ser auto-explicativo para eso.
Debe estar separado de la descripción corta por una línea en blanco.

### 5. El Pie (Footer) - (Opcional)

Generalmente se usa para dos cosas:

1.  **Breaking Changes (Cambios que rompen compatibilidad):** Deben empezar con la palabra `BREAKING CHANGE: ` seguido de un espacio o una exclamación `!` después del tipo/alcance (`feat!: ` o `feat(api)!: `). Esto indica un salto en la versión `MAJOR`.
2.  **Referenciar Issues:** Cerrar o referenciar tickets/issues (ej. `Closes #123`, `Fixes #45`).

---

## Ejemplos Reales

#### Commit de una nueva funcionalidad

```
feat(auth): implementar inicio de sesión con JWT

Se añade la dependencia de firebase-admin y se crea el
controlador principal para emitir los tokens a los usuarios
registrados.

Closes #42
```

#### Commit que soluciona un bug

```
fix(layout): corregir superposición del banner en móviles

El z-index del botón flotante estaba siendo oculto por la barra inferior.
```

#### Commit que rompe compatibilidad (Breaking Change)

```
refactor(api)!: eliminar el endpoint v1 de usuarios

BREAKING CHANGE: El endpoint `/api/v1/users` ha sido removido.
Por favor, migrar a `/api/v2/users` que ahora soporta paginación.
```

#### Commit simple, de una sola línea (El más común)

```
docs(api): actualizar ejemplo de respuesta en swagger
```

```
chore: actualizar dependencia de lodash a version 4.17
```
