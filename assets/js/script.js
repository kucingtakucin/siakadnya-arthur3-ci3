$(document).ready(function () {

	$('.detail').click(function () {
		const id = $(this).data('id')
		const baseurl = $(this).data('baseurl')
		fetch(`${baseurl}Mahasiswa/show`, {
			method: 'POST',
			mode: "same-origin",
			credentials: "same-origin",
			headers: {
				"Content-Type": "application/json",
				'Accept':       'application/json'
			},
			body: JSON.stringify({id: id})
		}).then(response => {
			if (response.ok) {
				console.log(response);
				return response.json()
			}
			throw new Error(response.statusText)
		}).then(response => {
			console.log(response)
			$('#detail_nama').val(response.nama)
			$('#detail_nim').val(response.nim)
			$('#detail_jurusan').val(response.jurusan)
			$('#detail_angkatan').val(response.angkatan)
			$('#detailModal img').attr({src: `${baseurl}assets/img/${response.foto}`, alt: `${response.nama}`})
		}).catch(error => {
			console.error(error);
		})
	})

	$('.update').click(function () {
		const id = $(this).data('id')
		const baseurl = $(this).data('baseurl')
		fetch(`${baseurl}Mahasiswa/show`, {
			method: 'POST',
			mode: "same-origin",
			credentials: "same-origin",
			headers: {
				"Content-Type": "application/json",
				'Accept':       'application/json'
			},
			body: JSON.stringify({id: id})
		}).then(response => {
			if (response.ok) {
				console.log(response)
				return response.json()
			}
			throw new Error(response.statusText)
		}).then(response => {
			console.log(response)
			$('#update_nama').val(response.nama)
			$('#update_nim').val(response.nim)
			$('#update_jurusan').val(response.jurusan)
			$('#update_angkatan').val(response.angkatan)
			$('#updateModal img.foto-lama').attr({src: `${baseurl}assets/img/${response.foto}`, alt: `${response.nama}`})
			$('#updateModal #fotolama').val(response.foto)
			$('#updateModal #update_id').val(response.id)
		}).catch(error => {
			console.error(error)
		})
	})

	$('.delete').click(function () {

	})
})
