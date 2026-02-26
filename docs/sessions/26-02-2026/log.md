# Log de Sesión: Génesis del Entorno Nativo (Windows)
**Fecha:** 26 de Febrero de 2026
**Ubicación:** `c:\Users\Administrator\Documents\w lab\lab-win`

## 1. El Despertar del Entorno
La sesión comenzó en una carpeta vacía dentro de Windows. El objetivo inicial era discernir la viabilidad de configurar un entorno de automatización potente sin depender de WSL o Docker, manteniendo una conexión directa con las APIs y el sistema de archivos nativo de Windows.

**Estado Inicial:**
- Carpeta `w lab` vacía.
- `winget` detectado como herramienta clave para la orquestación.
- Ausencia de SDKs de desarrollo (Python, .NET, Git).

## 2. La Gran Instalación
Se decidió utilizar `winget` como el instalador universal. En un solo flujo de trabajo automatizado, se procedió a la instalación de:
- **Git.Git**: Para el control de versiones.
- **Python 3.12**: Para scripting ágil.
- **Microsoft.DotNet.SDK.9**: Para el desarrollo de aplicaciones robustas con C#.

Tras la instalación, se realizó una corrección manual del `PATH` del usuario para asegurar que `python` y `git` fueran accesibles desde cualquier terminal de la sesión actual.

## 3. Colonización y Primeros Experimentos
Con las herramientas listas, se clonó el repositorio `lab` en una nueva carpeta denominada `lab-win`. Esto marcó el inicio de la experimentación nativa.

Se crearon dos núcleos de prueba:
- **Python Core**: Instalación de un entorno virtual (`venv`) y ejecución de `automation.py` (tiempo de respuesta: ~0.09s).
- **.NET Core**: Inicialización de una aplicación de consola en C# (tiempo de respuesta: ~4.8s).

## 4. El Orden tras el Caos (Reorganización)
Para evitar la contaminación del directorio raíz, la configuración se segregó en dos fronteras tecnológicas:
- `/python`: Contiene los scripts y el `venv`.
- `/dotnet`: Contiene el proyecto C# y los binarios de compilación.

Cada frontera fue equipada con su propio `README.md` detallando los rituales de activación y ejecución.

## 5. Fortificación del Repositorio
Finalmente, se implementó un archivo `.gitignore` robusto. Este escudo asegura que los binarios de .NET y las pesadas carpetas de entornos virtuales de Python no contaminen el historial de Git, manteniendo el repositorio ligero y enfocado únicamente en el código fuente.

---
**Resultado Final:** Un laboratorio de automatización operativo, rápido y nativamente integrado en Windows, listo para la creación de flujos de trabajo inteligentes.
