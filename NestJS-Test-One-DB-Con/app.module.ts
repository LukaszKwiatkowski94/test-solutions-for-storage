import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
// import { TasksModule } from './tasks/tasks.module';
// import { TasksGateway } from './tasks.gateway';
import { DatabaseModule } from './database/database.module';
// import { ConnectionProvider } from './database/database.providers';

@Module({
  imports: [DatabaseModule],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}
