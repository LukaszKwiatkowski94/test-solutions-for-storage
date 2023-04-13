// Mikroserwis module
import { Module } from "@nestjs/common";
import { MikroserwisService } from "./mikroserwis.service";

@Module({
	providers: [MikroserwisService],
	exports: [MikroserwisService],
})
export class MikroserwisModule {}

// Mikroserwis service
import { Injectable } from "@nestjs/common";

@Injectable()
export class MikroserwisService {
	getMikroserwisObject() {
		// Pobierz obiekt mikroserwisu
		return {
			// Obiekt reprezentujący mikroserwis
		};
	}
}

// Inny moduł
import { Module } from "@nestjs/common";
import { MikroserwisModule } from "./mikroserwis/mikroserwis.module";
import { InnyService } from "./inny.service";

@Module({
	imports: [MikroserwisModule],
	providers: [InnyService],
})
export class InnyModule {}

// Inny service
import { Injectable } from "@nestjs/common";
import { MikroserwisService } from "./mikroserwis/mikroserwis.service";

@Injectable()
export class InnyService {
	constructor(private readonly mikroserwisService: MikroserwisService) {}

	doSomething() {
		const mikroserwis = this.mikroserwisService.getMikroserwisObject();
		// Wykorzystaj obiekt mikroserwisu
	}
}
