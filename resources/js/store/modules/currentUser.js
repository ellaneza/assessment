	const state = {
		user: {}
	};
	const getters = {};
	const actions = {
		loginUser( {}, user ) 
		{
			axios.post( "/api/v1/user/login", {
					email: user.email,
					password: user.password
			})
			.then( response => {
					console.log(response.data);
					if( response.data.access_token )  {
							localStorage.setItem(
									"c3_token",
									response.data.access_token
							)
							window.location.replace("/home");
					}
			})
		}
	};
	const mutations = {};

	export default {
		namespaced: true,
		state,
		getters,
		actions,
		mutations
	}
