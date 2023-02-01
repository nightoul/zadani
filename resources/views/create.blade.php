@extends('layout')

@section('content')
<form id="chatgpt-form" action="/" method="POST" class="form">
@csrf
    <div class="title">Call ChatGPT</div>
    <div class="input-container" style="margin-top: 20px;">
        <input id="chatgpt-prompt" name="chatgpt_prompt" class="input" type="text" placeholder="Write brand name" autocomplete="off" />
    </div>
    <div class="input-container" style="margin-top: 20px;">
        <select id="language" class="input">
            <option id="en" value="en">English</option>
            <option id="cz" value="cz">Czech</option>
            <option id="fr" value="fr">French</option>
        </select>
    </div>
    <br>
    <a style="margin-top: 20px" id="chatgpt-generate" class="generate-prompt" >Ask ChatGPT</a>
    <a class="go-to-brands" href="/list">Go to all articles</a>
    <div class="textarea-container" style="margin-top: 30px;">
        <textarea id="chatgpt-response" name="chatgpt_response" class="input" placeholder="ChatGPT response" rows="20" cols="100"></textarea>
    </div>
    <div class="loader hide" style="color: white">Wait for the response...</div>
    <input type="submit" value="Submit" class="submit">
    <p style="color: red" >{{ session('message')  }}</p>
</form>

<script>
	document.getElementById('chatgpt-generate').addEventListener('click', () => {

        // show loader
        document.querySelector('.loader').classList.remove('hide');

		let data = {
			"model": "text-davinci-003",
			"prompt": "Write a text about " + document.getElementById('chatgpt-prompt').value + ' . Write it in ' + document.getElementById('language').value + '. Finish it.',
			"max_tokens": 500,
			"temperature": 0,
			"top_p": 1,
			"n": 1,
			"stream": false,
			"logprobs": null
		};

		fetch("https://api.openai.com/v1/completions", {
			method: "POST",
			headers: {
				'Content-Type': 'application/json',
				'Authorization': 'Bearer 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'
			},
			body: JSON.stringify(data),
		})
		.then(res => {
			if (!res.ok) {
				console.log('something went wrong');
			} else {
				return res.json();
			}
		})
		.then(data => {
            document.querySelector('.loader').classList.add('hide');
			document.getElementById("chatgpt-response").value = data.choices[0].text.trim();
		})
		.catch(error => {
			console.log(error);
		});
	});
</script>
@endsection
