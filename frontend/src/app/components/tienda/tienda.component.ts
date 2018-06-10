import { Component, OnInit } from '@angular/core';
import { trigger, state, style, transition, animate } from '@angular/animations';
import { fadeIn } from '../animation';

@Component({
	selector: 'app-tienda',
	templateUrl: './tienda.component.html',
	styleUrls: ['./tienda.component.css'],
	animations: [
		trigger('marcar', [
			state('inactive', style({
				border: '5px solid #ccc'
			})),
			state('active', style({
				border: '5px solid yellow',
				background: 'red',
				borderRadius: '50px',
				transform: 'scale(1.2)'
			})),
			transition('inactive => active', animate('300ms linear')),
			transition('active => inactive', animate('300ms linear'))
		]),
		fadeIn
	]
})
export class TiendaComponent implements OnInit{
	public titulo;
	public nombreDelParque: string;
	public miParque;
	public status;

	constructor(){
		this.titulo = 'Esta es la tienda';
		this.status = 'inactive';
	}

	cambiarEstado(status){
		if(status == 'inactive'){
			this.status = 'active';
		}else{
			this.status = 'inactive';
		}
	}

	ngOnInit(){
		$('#textojq').hide();
		$('#botonjq').click(function(){
			console.log('click desde jquery');
			$('#textojq').slideToggle();
		});

		$("#caja").dotdotdot({});
	}

	mostrarNombre(){
		console.log(this.nombreDelParque);
	}

	verDatosParque(event){
		console.log(event);
		this.miParque = event;
	}

	textoRichEditor(content){
		console.log(content);
	}
}
