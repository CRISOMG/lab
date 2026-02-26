# Entorno de Automatización Python (Windows Nativo)

Este directorio contiene la configuración para scripts de automatización utilizando Python 3.12.

## 🛠️ Configuración Realizada
1.  **Instalación**: Se instaló Python 3.12.10 mediante `winget`.
2.  **Entorno Virtual**: Se creó un `venv` localizado en `./python/venv` para aislar las dependencias del sistema global.
3.  **Scripts de Prueba**: Se incluyó `automation.py` para verificar el acceso al sistema operativo (NT).

## 🚀 Cómo usar este entorno
Para ejecutar scripts o instalar librerías:

### Activar el entorno (PowerShell)
```powershell
.\python\venv\Scripts\Activate.ps1
```

### Instalar dependencias
```powershell
.\python\venv\Scripts\pip.exe install <package_name>
```

### Ejecutar script de ejemplo
```powershell
.\python\venv\Scripts\python.exe .\python\automation.py
```

## 📝 Notas
*   **Path**: El binario global se encuentra en `$env:LOCALAPPDATA\Programs\Python\Python312\python.exe`.
*   **Propósito**: Diseñado para tareas rápidas de scripting, manipulación de archivos y automatización de procesos en Windows.
