import { NestFactory } from '@nestjs/core';
import { AppModule } from './app.module';
import {
  SwaggerModule,
  DocumentBuilder,
  SwaggerDocumentOptions,
  SwaggerCustomOptions,
} from '@nestjs/swagger';
// import { TasksModule } from './tasks/tasks.module';
// import { TasksController } from './tasks/tasks.controller';

async function bootstrap() {
  const app = await NestFactory.create(AppModule);
  const config = new DocumentBuilder()
    .setTitle('My Project')
    .setDescription('The is tested description')
    .setVersion('1.0')
    .addTag('tasks')
    .build();
  const option: SwaggerDocumentOptions = {
    include: [],
  };
  const document = SwaggerModule.createDocument(app, config, option);
  const customOptions: SwaggerCustomOptions = {
    customSiteTitle: 'My Project API Docs',
  };
  SwaggerModule.setup('api', app, document, customOptions);
  await app.listen(3000);
}
bootstrap();
