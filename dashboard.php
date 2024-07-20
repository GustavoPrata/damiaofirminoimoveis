<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Damião Firmino - Agendamentos</title>

    <!-- Icones -->
    <link rel="stylesheet" href="assets/fonts/style.css" />

    <!-- Swiper -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- STYLES -->
    <link rel="stylesheet" href="./css/style.css"/>
    <link rel="stylesheet" type="text" href="./css/lightbox.css">
    <link rel="stylesheet" href="./css/lightbox.min.css">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            position: relative;
            padding-bottom: 100px; /* Espaço para o rodapé */
        }
        .admin-container {
            width: 90%;
            max-width: 1200px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
            padding: 2rem;
        }
        .admin-container h2 {
            font-size: 1.75rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }
        .admin-table th, .admin-table td {
            padding: 1rem;
            border: 1px solid #ddd;
            text-align: left;
        }
        .admin-table th {
            background-color: #007bff;
            color: white;
        }
        .admin-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .admin-table tr:hover {
            background-color: #e0e0e0;
        }
        /* Style for status cell text */
        .status {
            font-weight: 500;
            color: green;
        }
        /* Highlight for "Pendente" status text */
        .status.pending {
            color: #ffc107; /* Yellow color for pending status */
        }
        .admin-table .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        .admin-table .action-buttons button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.875rem;
            transition: background-color 0.3s;
        }
        .admin-table .action-buttons .accept-button {
            background-color: #28a745;
            color: #fff;
        }
        .admin-table .action-buttons .accept-button:hover {
            background-color: #218838;
        }
        .admin-table .action-buttons .edit-button {
            background-color: #ffc107;
            color: #fff;
        }
        .admin-table .action-buttons .edit-button:hover {
            background-color: #e0a800;
        }
        .admin-table .action-buttons .delete-button {
            background-color: #dc3545;
            color: #fff;
        }
        .admin-table .action-buttons .delete-button:hover {
            background-color: #c82333;
        }
        .admin-container .back-link {
            display: block;
            text-align: center;
            margin-top: 2rem;
            font-size: 1rem;
            color: #007bff;
            text-decoration: none;
        }
        .admin-container .back-link:hover {
            text-decoration: underline;
        }
        /* Edit form styles */
        .edit-form-container {
            display: none;
            flex-direction: column;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
        }
        .edit-form {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        }
        .edit-form h3 {
            margin-bottom: 1rem;
            text-align: center;
        }
        .edit-form input,
        .edit-form select {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .edit-form .form-actions {
            display: flex;
            justify-content: space-between;
        }
        .edit-form .form-actions button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .edit-form .form-actions .save-button {
            background-color: #28a745;
            color: #fff;
        }
        .edit-form .form-actions .save-button:hover {
            background-color: #218838;
        }
        .edit-form .form-actions .cancel-button {
            background-color: #dc3545;
            color: #fff;
        }
        .edit-form .form-actions .cancel-button:hover {
            background-color: #c82333;
        }
        .footer {
            width: 100%;
            --hue: 198;
            --base-color: hsl(var(--hue) 0% 17%);
            background: var(--base-color);
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            left: 0;
        }
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .footer-content a,
        .footer-content p {
            color: white;
        }
        .social {
            display: flex;
            gap: 10px;
        }
        .logo-footer {
            max-height: 50px;
        }
        @media (max-width: 768px) {
            .footer-content {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .footer-content p {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
<header id="header">
    <nav class="container">
      <a class="logo" href="#">
          <img src="./assets/svg/logo6.png" alt="Logo Damião." loading="lazy">
      </a>
      <!-- menu -->
      <div style="margin-left: 60%;" class="menu">
        <ul class="grid">
          <li><a class="title" href="index.html">Voltar para a home</a></li>
          <li><a class="title" href="./php/logout.php">Sair</a></li>
        </ul>
      </div>
      <!-- /menu -->
      <div class="social-links">

      </div>
      <div class="toggle icon-menu"></div>
      <div class="toggle icon-close"></div>
    </nav>
  </header>
    <br><br><br><br>
    <div class="admin-container">
        <h2>Horários Agendados</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="appointmentTableBody">
                <!-- Rows will be added dynamically here -->
            </tbody>
        </table>
    </div>

    <!-- Edit form container -->
    <div class="edit-form-container" id="editFormContainer">
        <form class="edit-form" id="editForm">
            <h3>Editar Agendamento</h3>
            <input type="hidden" id="editId" name="id">
            <input type="text" id="editNome" name="nome" placeholder="Nome">
            <input type="text" id="editTelefone" name="telefone" placeholder="Telefone">
            <input type="datetime-local" id="editDataHora" name="data_hora">
            <select id="editStatus" name="status">
                <option value="Pendente">Pendente</option>
                <option value="Confirmado">Confirmado</option>
            </select>
            <div class="form-actions">
                <button type="button" class="save-button" onclick="saveEdit()">Salvar</button>
                <button type="button" class="cancel-button" onclick="closeEditForm()">Cancelar</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchAppointments();
        });

        function fetchAppointments() {
    fetch('./php/fetch_appointments.php')
        .then(response => response.json())
        .then(data => {
            // Ordena os compromissos por data e hora
            data.sort((a, b) => new Date(a.data_hora) - new Date(b.data_hora));
            
            const tbody = document.getElementById('appointmentTableBody');
            tbody.innerHTML = '';
            data.forEach(appointment => {
                // Determina a classe para o texto de status
                const statusClass = appointment.status === 'Pendente' ? 'pending' : '';

                // Determina se deve mostrar o botão "Aceitar"
                const acceptButton = appointment.status === 'Pendente' 
                    ? `<button class="accept-button" onclick="acceptAppointment(${appointment.id}, '${appointment.telefone}', '${appointment.nome}', '${new Date(appointment.data_hora).toLocaleString()}')">
                        <i class="fas fa-check"></i> ✔️
                    </button>` 
                    : '';

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${appointment.nome}</td>
                    <td>${appointment.telefone}</td>
                    <td>${new Date(appointment.data_hora).toLocaleDateString()}</td>
                    <td>${new Date(appointment.data_hora).toLocaleTimeString()}</td>
                    <td class="status ${statusClass}">
                        ${appointment.status}
                        ${acceptButton}
                    </td>
                    <td class="action-buttons">
                        <button class="edit-button" onclick="openEditForm(${appointment.id}, '${appointment.nome}', '${appointment.telefone}', '${appointment.data_hora}', '${appointment.status}')">
                            <i class="fas fa-pen"></i> ✏️
                        </button>
                        <button class="delete-button" onclick="deleteRecord(${appointment.id})">
                            <i class="fas fa-trash"></i> 🗑️
                        </button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        });
}

            
        function acceptAppointment(id, telefone, nome, dataHora) {
            fetch('./php/accept_appointment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    id: id
                })
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                const whatsappMessage = `Olá ${nome}, seu agendamento foi confirmado para a data: ${dataHora}. Obrigado!`;
                const whatsappUrl = `https://wa.me/${telefone.replace(/\D/g, '')}?text=${encodeURIComponent(whatsappMessage)}`;
                window.open(whatsappUrl, '_blank');
                fetchAppointments();
            });
        }

        function openEditForm(id, nome, telefone, dataHora, status) {
            document.getElementById('editId').value = id;
            document.getElementById('editNome').value = nome;
            document.getElementById('editTelefone').value = telefone;
            document.getElementById('editDataHora').value = dataHora.substring(0, 16); // Format datetime-local input
            document.getElementById('editStatus').value = status;
            document.getElementById('editFormContainer').style.display = 'flex';
        }

        function closeEditForm() {
            document.getElementById('editFormContainer').style.display = 'none';
        }

        function saveEdit() {
            const id = document.getElementById('editId').value;
            const nome = document.getElementById('editNome').value;
            const telefone = document.getElementById('editTelefone').value;
            const dataHora = document.getElementById('editDataHora').value;
            const status = document.getElementById('editStatus').value;

            fetch('./php/edit_appointment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    id: id,
                    nome: nome,
                    telefone: telefone,
                    data_hora: dataHora,
                    status: status
                })
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                closeEditForm();
                fetchAppointments();
            });
        }

        function deleteRecord(id) {
            if (confirm('Tem certeza de que deseja apagar este registro?')) {
                fetch('./php/delete_appointment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        id: id
                    })
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    fetchAppointments();
                });
            }
        }
    </script>
    
</body>
<br><br><br>
<footer class="footer">
  <div class="footer-content">
    <a class="" href="#home">
      <img class="logo-footer" src="./assets/svg/logo6.png" alt="Logo Damião" loading="lazy">
    </a>
    <p style="color:white">©2024 Damião Firmino.<br>Todos os direitos reservados.<br><br>Desenvolvido por Gustavo Prata</p>
    <div class="social">
      <a href="https://www.instagram.com/damiaofirmino.imoveis/" target="_blank">
        <i class="icon-instagram"></i>
      </a>
      <a href="https://www.facebook.com/" target="_blank">
        <i class="icon-facebook"></i>
      </a>
    </div>
  </div>
</footer>

</html>
