# Entorno .NET para Automatización (Windows Nativo)

Este directorio contiene la configuración para el desarrollo de automatizaciones robustas utilizando **.NET 9.0**.

## 🛠️ Configuración Realizada
1.  **Instalación**: Se instaló el **.NET SDK 9.0.311** mediante `winget`.
2.  **Proyecto Demo**: Se inicializó una aplicación de consola en C# integrada en la estructura del repositorio.
3.  **Restauración**: Se realizó una primera compilación y ejecución exitosa para asegurar el correcto funcionamiento del SDK.

## 🚀 Cómo usar este entorno

### Ejecutar el proyecto actual
Desde el root del repositorio:
```powershell
dotnet run --project .\dotnet\WinAutomation.csproj
```

### Crear un nuevo proyecto
```powershell
dotnet new <template> -n <ProjectName> -o .\dotnet\<ProjectName>
```

### Compilar el proyecto
```powershell
dotnet build .\dotnet\WinAutomation.csproj
```

## 📝 Notas
*   **Path**: El ejecutable global es `C:\Program Files\dotnet\dotnet.exe`.
*   **SDK**: Compatible con C# 13 y todas las características modernas de .NET.
*   **Integración**: Ideal para servicios de Windows, tareas programadas e interacción con APIs de bajo nivel de Windows.
