import { config } from '../config'

class Api {

    constructor() {
        this.baseUrl = config.baseUrl;
        // this.apiKeyClient = config.apiKeyClient
        this.headers = {
            'Content-Type': 'application/json'
        }
        // let token = document.head.querySelector('meta[name="csrf-token"]');
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        if (token) {
            //this.headers['X-CSRF-TOKEN'] = token.content;
            this.headers['X-CSRF-TOKEN'] = token;
            // window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        } else {
            console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
        }
    }
    /**
     * Method for request api graphql
     *
     * @return Object or Array with the answer of API
     * @param data data with request
     * @param schema can is null is schema for request
     */
    async post(data,route = "") {

        // let access_token = localStorage.getItem("access_token");
        // let headers = {
        //     'Content-Type': 'application/json',
        //     // 'api-key-client': this.apiKeyClient
        // }
        // if (!access_token || access_token != "null" || access_token != null) {
        //     headers.Authorization = `Bearer ${JSON.parse(access_token)}`
        // }

        if (data.toLocaleString() === "[object Object]") {
            this.headers['Content-Type'] = 'application/json'
            data = JSON.stringify(data)
        } else {
            delete this.headers['Content-Type']
        }


        try {
            let response = await fetch(`${this.baseUrl}${route}`, {
                method: 'POST',
                body: data,
                headers: this.headers
            });
            if (response.ok) {
                let responseJson = response.json();
                return responseJson;

            } else {
                let responseJson = response.json();
                // console.log("Success Errror: "+responseJson);
                return responseJson;
            }
        } catch (error) {
            console.log('error');

            return error
        }
    }

    async get(route = "") {

        // let access_token = localStorage.getItem("access_token");
        // let this.headers = {
        //     'Content-Type': 'application/json',
        //     // 'api-key-client': this.apiKeyClient
        // }
        // if (!access_token || access_token != "null" || access_token != null) {
        //     this.headers.Authorization = `Bearer ${JSON.parse(access_token)}`
        // }

        try {
            let response = await fetch(`${this.baseUrl}${route}`, {
                method: 'GET',
                headers: this.headers
            });
            if (response.ok) {
                let responseJson = response.json();
                console.log("Success: "+responseJson);
                return responseJson;

            } else {
                let responseJson = response.json();
                console.log("Success Errror: "+responseJson);
                return responseJson;
            }
        } catch (error) {
            console.log('error');

            return error
        }
    }

    async basicGet(route) {

        // let access_token = localStorage.getItem("access_token");
        // let this.headers = {
        //     'Content-Type': 'application/json',
        //     // 'api-key-client': this.apiKeyClient
        // }
        // if (!access_token || access_token != "null" || access_token != null) {
        //     this.headers.Authorization = `Bearer ${JSON.parse(access_token)}`
        // }

        try {
            let response = await fetch(`${route}`, {
                method: 'GET',
                headers: this.headers
            });
            if (response.ok) {
                let responseJson = response.json();
                console.log("Success: "+responseJson);
                return responseJson;

            } else {
                let responseJson = response.json();
                console.log("Success Errror: "+responseJson);
                return responseJson;
            }
        } catch (error) {
            console.log('error');

            return error
        }
    }
}

export default Api
